class Administrator {
    constructor(ID, login, password) {
        this.ID = ID;
        this.login = login;
        this.password = password;
    }
}

class Master {
    constructor(ID, login, password, isTop) {
        this.ID = ID;
        this.login = login;
        this.password = password;
        this.isTop = isTop;
    }
}

class Client {
    constructor(ID, login, password, name) {
        this.ID = ID;
        this.login = login;
        this.password = password;
        this.name = name;
    }
}

class Schedule {
    constructor() {
        this.listOfEntries = [];
    }
}