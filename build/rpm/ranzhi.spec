Name:ranzhi
Version:2.7.stable
Release:1
Summary:This is RanZhi software.	

Group:utils
License:ZPL
URL:http://www.ranzhi.org
Source0:%{name}-%{version}.tar.gz
BuildRoot:%{_tmppath}/%{name}-%{version}-root
BuildArch:noarch
Requires:httpd,php-cli,php,php-common,php-pdo,php-mysql,php-json,php-ldap,mysql 

%description

%prep
%setup -c

%install
mkdir -p $RPM_BUILD_ROOT
chmod 777 -R %{_builddir}/%{name}-%{version}/opt/ranzhi/tmp/
chmod 777 -R %{_builddir}/%{name}-%{version}/opt/ranzhi/www/data
chmod 777 -R %{_builddir}/%{name}-%{version}/opt/ranzhi/config
chmod 777 %{_builddir}/%{name}-%{version}/opt/ranzhi/app
chmod 777 %{_builddir}/%{name}-%{version}/opt/ranzhi/www
chmod a+rx %{_builddir}/%{name}-%{version}/opt/ranzhi/bin/*
find %{_builddir}/%{name}-%{version}/opt/ranzhi/ -name ext |xargs chmod -R 777
cp -a %{_builddir}/%{name}-%{version}/* $RPM_BUILD_ROOT 

%clean
rm -rf $RPM_BUILD_ROOT

%files
/

%post
chcon -R --reference=/var/www/html/ /opt/ranzhi/
lowVersion=`httpd -v|awk '$3~/Apache/{print $3}'|awk -F '/' '{print ($2<2.4) ? 1 : 0}'`
if [ $lowVersion -eq 1 ]; then
sed -i '/Require all granted/d' /etc/httpd/conf.d/ranzhi.conf
fi

echo "ranzhi has been successfully installed."
echo "Please restart httpd and visit http://localhost/ranzhi."
