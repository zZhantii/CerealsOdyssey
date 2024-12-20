export class User {
    constructor(user_id, firstName, lastName, password, email, rol) {
        this.user_id = user_id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.password = password;
        this.email = email;
        this.rol = rol;
    }
}