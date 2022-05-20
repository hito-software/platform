import {AppActionType} from './AppActionType';

const initialState = {
    showMenu: false,
    showChat: false,
    onlineUsers: []
};

export const AppReducer = (state = initialState, action) => {
    switch (action.type) {
        case AppActionType.TOGGLE_MENU:
            return {
                ...state,
                showMenu: !state.showMenu,
            }
        case AppActionType.TOGGLE_CHAT:
            return {
                ...state,
                showChat: !state.showChat
            }
        case AppActionType.SAVE_ONLINE_USERS:
            return {
                ...state,
                onlineUsers: action.payload
            }

        default:
            return state;
    }
}
