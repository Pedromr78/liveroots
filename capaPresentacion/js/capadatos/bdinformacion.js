class bdinformacion {
    constructor(nombre, descripcion, cuidados) {
        this._nombre = nombre;
        this._descripcion = descripcion;
        this._cuidados = cuidados;

    }

    set nombre(n) {
        this._nombre = n;
    }
    set descripcion(n) {
        this._descripcion = n;
    }
    set cuidados(n){
        this._cuidados = n;
    }



    get nombre() {
        return this._nombre;
    }
    get descripcion() {
        return this._descripcion;
    }
    get cuidados() {
        return this._id;
    }

    extraerinformacion(){
        
    }

}
