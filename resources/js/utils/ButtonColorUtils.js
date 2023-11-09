class ButtonColorUtils {
    static isLocalhost() {
        return window.location.hostname === 'localhost';
    }

    static getRandomColor() {
        const tailwindColors = [
            'bg-red-500',
            'bg-blue-500',
            'bg-green-500',
            'bg-gray-500',
            // Add more Tailwind CSS color classes as needed
        ];
    
        const randomIndex = Math.floor(Math.random() * tailwindColors.length);
        return tailwindColors[randomIndex];
    }
}

export default ButtonColorUtils;