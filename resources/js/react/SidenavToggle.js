import {AppAction, AppActionType, AppSelector} from "../redux/app";

const SidenavToggle = function ({dispatch}) {
    return <button onClick={() => dispatch(AppAction.toggleMenu())}
        className="relative w-[50px] h-[50px] block flex items-center justify-center rounded-full hover:bg-blue-200">
        <i className="fas fa-bars text-3xl"/>
    </button>;
}

export default SidenavToggle;
