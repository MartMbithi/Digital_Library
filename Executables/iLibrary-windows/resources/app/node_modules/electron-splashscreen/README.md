<div align="center">
  <h2>electron-splashscreen</h2>
  <img alt="electron-splashscreen" src="https://raw.githubusercontent.com/bkniffler/electron-splashscreen/master/assets/preview.png" height="300px" />
  <br />
  <strong>Nice splashscreens for your electronjs app</strong>
  <br />
  <br />
  <a href="https://travis-ci.org/bkniffler/electron-splashscreen">
    <img src="https://img.shields.io/travis/bkniffler/electron-splashscreen.svg?style=flat-square" alt="Build Status">
  </a>
  <a href="https://codecov.io/github/bkniffler/electron-splashscreen">
    <img src="https://img.shields.io/codecov/c/github/bkniffler/electron-splashscreen.svg?style=flat-square" alt="Coverage Status">
  </a>
  <a href="https://github.com/bkniffler/electron-splashscreen">
    <img src="http://img.shields.io/npm/v/electron-splashscreen.svg?style=flat-square" alt="Version">
  </a>
  <a href="https://github.com/bkniffler/electron-splashscreen">
    <img src="https://img.shields.io/badge/language-typescript-blue.svg?style=flat-square" alt="Language">
  </a>
  <a href="https://github.com/bkniffler/electron-splashscreen/master/LICENSE">
    <img src="https://img.shields.io/github/license/bkniffler/electron-splashscreen.svg?style=flat-square" alt="License">
  </a>
  <br />
  <br />
</div>

## Install

<a name="yarn"/>

### Yarn

```
yarn add electron-splashscreen
```

<a name="npm"/>

### NPM

```
npm i electron-splashscreen
```

## Example

```jsx
const initSplash = require('electron-splashscreen');
const isDev = require('electron-is-dev');
const { resolve } = require('app-root-path');

app.on('ready', async () => {
  const mainWindow = new BrowserWindow({
    ...
  });

  const hideSplashscreen = initSplash({
    mainWindow,
    icon: isDev ? resolve('assets/icon.ico') : undefined,
    url: require.resolve('electron-splashscreen/office.html'),
    width: 500,
    height: 300,
    brand: 'My Brand',
    productName: 'My App',
    logo: resolve('assets/logo.svg'),
    website: 'www.my-brand.com',
    text: 'Initializing ...'
  });

  // send an ipcRenderer.send('ready') from your browser as soon as the app is ready
  ipcMain.on('ready', hideSplashscreen);

  mainWindow.once('ready-to-show', () => {
    // Electron-splash will automatically show the mainwindow as soon, but you can show it earlier in dev
    if (isDev) {
      mainWindow.show();
    }
  });
})
```
