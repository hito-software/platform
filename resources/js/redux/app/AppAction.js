import {AppActionType} from './AppActionType';

const toggleMenu = () => ({
    type: AppActionType.TOGGLE_MENU
});

const toggleChat = () => ({
    type: AppActionType.TOGGLE_CHAT
});

const saveOnlineUsers = (users) => ({
    type: AppActionType.SAVE_ONLINE_USERS,
    payload: users
});

export const AppAction = {
    toggleMenu,
    toggleChat,
    saveOnlineUsers
};
