class EntryForm {
    async RegiMethod() { //Метод, отправляющий запрос с данным для регистрации
        async function getLoginAndPasswordToRegi(login, password, name) {
            const answer = await fetch('api/?method=reg&login=' + `${login}` + '&password=' + `${password}` + '&name=' + `${name}`);
            return answer.json;
        }

        var login = document.getElementById('loginRegi').value;
        var password = document.getElementById('passwordRegi').value;
        var name = document.getElementById('name').value;

        await getLoginAndPasswordToRegi(login, password, name);
    }

    async EntryMethod() { //Метод,отправляющий запрос для авторизации
        async function getLoginAndPasswordToAuth(login, password) {
            const answer = await fetch('api/?method=login&login=' + `${login}` + '&password=' + `${password}`);
            return answer.json;
        }

        var login = document.getElementById('loginEntry').value;
        var password = document.getElementById('passwordEntry').value;

        await getLoginAndPasswordToAuth(login, password);

    }

    async getRacesMethod() {
        async function getRacesMethod(token) {
            const answer = await fetch('api/?method=getRaces&token=' + `${token}`);
            return answer.json;
        }
        //token = 
        await getRacesMethod(token);

    }


    //LogoutMethod() {}
}