import {AppSelector} from '../redux/app';
import classNames from "classnames";

const Sidenav = function (props) {
    const isActive = Redux.useSelector(AppSelector.getShowMenu);
    const content = props.children ?? '';

    React.useEffect(() => {
        const body = document.querySelector('body');

        if (isActive) {
            body.classList.add('overflow-hidden', 'md:overflow-auto');
        } else {
            body.classList.remove('overflow-hidden', 'md:overflow-auto');
        }
    }, [isActive])

    return <aside
        className={classNames('sidenav', {
            'sidenav--active': isActive
        })}>
        <div className="sidenav__wrapper">
            <div className="flex flex-col h-full">
                <div className="h-[80px] px-4 flex items-center xl:hidden">
                    <hito-sidenav-toggle></hito-sidenav-toggle>
                </div>

                <div dangerouslySetInnerHTML={{__html: content }} className="flex flex-col flex-1 overflow-auto"/>
            </div>
        </div>
    </aside>
}

export default Sidenav;
