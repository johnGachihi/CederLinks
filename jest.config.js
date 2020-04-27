module.exports = {
    // testRegex: 'resources/js/admin/test/.*.spec.js$',
    testRegex: '.*.spec.js$',
    transform: {"^.+\\.jsx?$": "babel-jest"},
    setupFilesAfterEnv: ['<rootDir>/jest.setup.js'],
    transformIgnorePatterns: ["node_modules/(?!(@material)/)",],
    moduleNameMapper: {
        "\\.(css|scss)$": "identity-obj-proxy",
        "\\.(jpeg|jpg)$": "<rootDir>/resources/js/__mocks__/fileMock.js"
    }
};
