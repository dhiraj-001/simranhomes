// SVG Asset Loader for Vite
// This file imports all SVG icons and makes them available globally

// Import all SVG icons from the icon directory
const svgModules = import.meta.glob('../icon/**/*.svg', { eager: true });

// Create a mapping of SVG paths to their Vite URLs
const svgMap = {};

Object.entries(svgModules).forEach(([path, module]) => {
    const fileName = path.split('/').pop();
    const name = fileName.replace('.svg', '');
    svgMap[name] = module.default;
});

// Make SVGs available globally
window.svgAssets = svgMap;

// Helper function to get SVG URL
window.getSvgUrl = (name) => {
    return svgMap[name] || `/frontend_assets/icon/${name}.svg`;
};

// Helper function to create SVG element
window.createSvgElement = (name, className = '', alt = '') => {
    const img = document.createElement('img');
    img.src = getSvgUrl(name);
    img.alt = alt || name;
    if (className) img.className = className;
    return img;
};

// Export for module usage
export { svgMap, getSvgUrl, createSvgElement };
