import {AppAction, AppActionType} from "../redux/app";

const ChatnavToggle = function ({dispatch}) {
    return <button onClick={() => dispatch(AppAction.toggleChat())}
              className="header-menu__icon">
        <i className="fas fa-comment-dots text-3xl"/>
    </button>
}

export default ChatnavToggle;
