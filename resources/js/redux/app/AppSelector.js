const getState = (state) => state.app;
const getShowMenu = (state) => getState(state).showMenu;
const getShowChat = (state) => getState(state).showChat;
const getOnlineUsers = (state) => getState(state).onlineUsers;

export const AppSelector = {
    getShowMenu,
    getShowChat,
    getOnlineUsers
}
