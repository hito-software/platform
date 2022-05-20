const NotificationIcon = function (props) {
    const {url} = props;
    const [hasNotifications, updateHasNotifications] = window.React.useState(false);

    window.React.useEffect(() => {
        Echo.private(`App.Models.User.` + window.userID)
            .notification((notification) => {
                updateHasNotifications(true);
            })
            .error((error) => {
                console.error(error);
            });
    }, []);

    return <a href={url} onClick={() => updateHasNotifications(false)}
              className="header-menu__icon">
        {hasNotifications ? <span className="absolute bottom-0 right-0 w-[1rem] h-[1rem] rounded-full bg-red-500 block mb-2 mr-2 border-2
        border-white"></span> : false}
        <i className="fas fa-bell text-3xl"></i>
    </a>
}

export default NotificationIcon;
