import { SVGAttributes } from 'react';

export default function AppLogoIcon(props: SVGAttributes<SVGElement>) {
    return (
        <svg {...props} viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
            <path d="M12 2L14 8H22L16 12L18 18L12 14L6 18L8 12L2 8H10L12 2Z" opacity="0.3"/>
            <path d="M9.5 3C8.67157 3 8 3.67157 8 4.5V6H7C6.44772 6 6 6.44772 6 7V8C6 8.55228 6.44772 9 7 9H17C17.5523 9 18 8.55228 18 8V7C18 6.44772 17.5523 6 17 6H16V4.5C16 3.67157 15.3284 3 14.5 3H9.5ZM10 6V5H14V6H10ZM7 10V20C7 20.5523 7.44772 21 8 21H16C16.5523 21 17 20.5523 17 20V10H15V19H9V10H7Z"/>
        </svg>
    );
}