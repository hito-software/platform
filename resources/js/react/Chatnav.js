import {AppAction, AppSelector} from '../redux/app';
import classNames from 'classnames';

const updateStatus = function ([content, updateContent], users, isOnline = true) {
    const element = document.createElement('div');
    element.innerHTML = content;

    const onlineClass = 'chatnav__item--online';
    const offlineClass = 'chatnav__item--offline';

    users.forEach((user) => {
        const userElement = element.querySelector(`.chatnav__item[data-id="${user}"]`);
        if (userElement) {
            if (isOnline) {
                userElement.classList.replace(offlineClass, onlineClass);
            } else {
                userElement.classList.replace(onlineClass, offlineClass);
            }
        }
    });

    updateContent(element.innerHTML);
}

const Chatnav = function (props) {
    const {dispatch} = props;
    const state = Redux.useSelector(AppSelector.getShowChat);
    const [content, updateContent] = window.React.useState(props.children ?? '');

    Echo.join(`online-users`)
        .here((users) => {
            dispatch(AppAction.saveOnlineUsers(users));
            updateStatus([content, updateContent], users);
        })
        .joining((user) => {
            updateStatus([content, updateContent], [user]);
        })
        .leaving((user) => {
            updateStatus([content, updateContent], [user], false);
        })
        .error((error) => {
            console.error(error);
        });

    return <aside
        className={classNames('chatnav', {
            'chatnav--active': state
        })}>
        <div className="chatnav__wrapper">
            <div className="h-[80px] px-4 flex items-center justify-end xl:hidden">
                <button onClick={() => dispatch(AppAction.toggleChat())}
                className={'relative w-[50px] h-[50px] block flex items-center justify-center rounded-full hover:bg-blue-200'}><i className={'fas fa-times text-3xl'}></i></button>
            </div>

            <div dangerouslySetInnerHTML={{__html: content }}/>
        </div>
    </aside>
}

export default Chatnav;
