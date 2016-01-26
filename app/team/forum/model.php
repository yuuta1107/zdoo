<?php
/**
 * The model file of forum module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     forum
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
class forumModel extends model
{
    /**
     * Get boards.
     * 
     * @access public
     * @return array
     */
    public function getBoards()
    {
        $boards = array();
        $rawBoards = $this->dao->select('*')
            ->from(TABLE_CATEGORY)
            ->where('type')->eq('forum')
            ->orderBy('grade, `order`')
            ->fetchGroup('parent');
        if(!isset($rawBoards[0])) return $boards;

        foreach($rawBoards[0] as $parentBoard)
        {
            if(!$this->hasRights($parentBoard)) continue;

            if(isset($rawBoards[$parentBoard->id]))
            {
                foreach($rawBoards[$parentBoard->id] as $key => $childBoard) 
                {
                    if(!$this->hasRights($childBoard)) unset($rawBoards[$parentBoard->id][$key]);
                    
                    $childBoard->lastPostReplies = isset($replies[$childBoard->postID]) ? $replies[$childBoard->postID] : 0;
                    $childBoard->moderators      = explode(',', trim($childBoard->moderators, ','));
                }
                $parentBoard->children = $rawBoards[$parentBoard->id];
                $boards[] = $parentBoard;
            }
        }

        $speakers = array();
        foreach($boards as $parentBoard)
        {
            foreach($parentBoard->children as $childBoard)
            {
                foreach($childBoard->moderators as $moderators) $speakers[] = $moderators;
                $speakers[] = $childBoard->postedBy;
            }
        }
        $speakers = $this->loadModel('user')->getRealNamePairs($speakers);
        foreach($boards as $parentBoard)
        {
            foreach($parentBoard->children as $childBoard) 
            {
                foreach($childBoard->moderators as $key => $moderators) $childBoard->moderators[$key] = isset($speakers[$moderators]) ? $speakers[$moderators] : '';
                $childBoard->postedByRealname = !empty($childBoard->postedBy) ? $speakers[$childBoard->postedBy] : '';
            }
        }

        return $boards;
    }

    /**
     * Update stats of forum.
     * 
     * @access public
     * @return void
     */
    public function updateStats()
    {
        $boards = $this->dao->select('id')->from(TABLE_CATEGORY)->where('grade')->eq(2)->andWhere('type')->eq('forum')->fetchAll();
        foreach($boards as $board) $this->updateBoardStats($board->id);
    }

    /**
     * Update status of boards.
     * 
     * @param  int    $boardID 
     * @access public
     * @return void
     */
    public function updateBoardStats($boardID)
    {
        /* Get threads and replies. */
        $stats = $this->dao->select('COUNT(id) as threads, SUM(replies) as replies')->from(TABLE_THREAD)
            ->where('board')->eq($boardID)
            ->andWhere('hidden')->eq('0')
            ->fetch();

        /* Get postID and replyID. */
        $post = $this->dao->select('id as postID, replyID, repliedDate as postedDate, repliedBy, author')->from(TABLE_THREAD)
            ->where('board')->eq($boardID)
            ->andWhere('hidden')->eq('0')
            ->orderBy('repliedDate desc')
            ->limit(1)
            ->fetch();

        $data = new stdclass();
        $data->threads = $stats->threads;
        $data->posts   = $stats->threads + $stats->replies;
        if($post)
        {
            $data->postID     = $post->postID;
            $data->replyID    = $post->replyID;
            $data->postedDate = $post->postedDate;
            $data->postedBy   = $post->repliedBy ? $post->repliedBy : $post->author;
        }
        else
        {
            $data->postID   = 0;
            $data->replyID  = 0;
            $data->postedBy = '';
        } 

        $this->dao->update(TABLE_CATEGORY)->data($data)->where('id')->eq($boardID)->exec();
    }

    /**
     * Judge a board is new or not.
     * 
     * @param string $board 
     * @access public
     * @return void
     */
    public function isNew($board)
    {
        return (time() - strtotime($board->postedDate)) < 24 * 60 * 60 * $this->config->forum->newDays;
    }

    /**
     * Judge a user can post thread to a board or not.
     * 
     * @param  object    $board 
     * @access public
     * @return void
     */
    public function canPost($board)
    {
        /* If the board is an open one, return true. */
        if($board->readonly == false) return true;

        /* Then check the user is admin or not. */
        if($this->app->user->admin == 'super') return true; 

        /* Then check the user is a moderator or not. */
        $user = ",{$this->app->user->account},";
        $moderators = ',' . str_replace(' ', '', implode($board->moderators, ',')) . ',';
        if(strpos($moderators, $user) !== false) return true;

        return false;
    }

    /**
     * Check if user has rights to view a board. 
     * 
     * @param  object $board 
     * @access public
     * @return bool 
     */
    public function hasRights($board)
    {
        $groups = $this->dao->select('`group`')->from(TABLE_USERGROUP)->where('account')->eq($this->app->user->account)->fetchPairs();
        if(is_array($board->moderators)) $board->moderators = ',' . implode(',', $board->moderators) . ',';

        $canView = true;
        /* If the user isn't an administrator nor the moderator, check rights.  */
        if($this->app->user->admin != 'super' && strpos($board->moderators, ',' . $this->app->user->account . ',') === false)
        {
            if(!empty($board->users))
            {
                $canView = strpos(',' . $this->app->user->account . ',', $board->users) !== false;
            }

            if(!empty($board->rights))
            {
                $canView = !empty(array_intersect($groups, explode(',', $board->rights)));
            }
        }
        /* If the board can view check the board's parent. */
        if($canView && $board->parent != 0)
        {
            $board   = $this->dao->select('*')->from(TABLE_CATEGORY)->where('id')->eq($board->parent)->andWhere('type')->eq('forum')->fetch();
            $canView = $this->hasRights($board);
        }
        return $canView;
    }
}
