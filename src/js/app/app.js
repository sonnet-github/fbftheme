import tabs from './components/Tabs'
import accordions from './components/Accordions'
import popup from './components/Popup'
import navigation from './components/Navigation';
import customRegister from './components/CustomRegister';
import loginViaEmail from './components/LoginViaEmail';
import saveTestA from './components/SaveTestA';
import saveTestB from './components/SaveTestB';
import deleteAccount from './components/DeleteAccount';
import updateUser from './components/UpdateUser';

document.addEventListener("DOMContentLoaded", function () {
    tabs();
    accordions();
    popup();
    navigation();
    customRegister();
    loginViaEmail();
    saveTestA();
    saveTestB();
    deleteAccount();
    updateUser();
});