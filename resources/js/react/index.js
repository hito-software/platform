import Chatnav from './Chatnav';
import ChatnavToggle from './ChatnavToggle';
import NotificationIcon from './NotificationIcon';
import Sidenav from './Sidenav';
import SidenavToggle from './SidenavToggle';
import TimezoneAlert from './TimezoneAlert';

const component = window.defineComponent;

component('hito-sidenav', Sidenav);
component('hito-sidenav-toggle', SidenavToggle);
component('hito-chatnav', Chatnav);
component('hito-chatnav-toggle', ChatnavToggle);
component('hito-timezone-alert', TimezoneAlert);
component('hito-notification-icon', NotificationIcon);
