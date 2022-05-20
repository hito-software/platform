import classNames from 'classnames';

const TimezoneAlert = function (props) {
    const {value, url} = props;
    const [isShown, updateIsShown] = window.React.useState(false);

    window.React.useEffect(() => {
        const timezoneDetect = window.moment().format('Z');

        if (sessionStorage.getItem('timezone-ignore') || !value) {
            return;
        }

        const timezone = window.moment().utcOffset(parseFloat(value)).format('Z');
        const detectedTimezone = window.moment().format('Z');

        setTimeout(() => {
            if (detectedTimezone !== timezone) {
                updateIsShown(detectedTimezone !== timezone);
                markAsIgnored();
            }
        }, 2000);
    }, [value, url]);

    const markAsIgnored = () => {
        sessionStorage.setItem('timezone-ignore', 'true');
    };

    const dismiss = () => {
        updateIsShown(false);
        markAsIgnored();
    }

    return <div className={classNames('timezone-alert', {
        'timezone-alert--active': isShown,
    })}>
        <div className="space-y-2">
            <div className="font-bold text-sm tracking-wide uppercase">Different timezone detected</div>
            <p>The configured timezone is different than the timezone of the device you're using.</p>
        </div>
        <div>
            <a href={url}
               className="bg-blue-500 py-2 px-4 rounded text-white uppercase text-sm font-bold tracking-wide hover:bg-opacity-90">Update
                timezone</a>
            <div className="absolute top-0 right-0">
                <button className="p-4" onClick={() => dismiss()}><i className="fas fa-times"></i></button>
            </div>
        </div>
    </div>;
}

export default TimezoneAlert;
