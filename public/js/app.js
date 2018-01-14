class Errors{
    constructor(){
        this.errors = {}
    }
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors){
        this.errors = errors;
    }
    has(field){
        return this.errors.hasOwnProperty(field);
    }
    any(){
        return Object.keys(this.errors).length > 0;
    }
    clear(field){
        if(field) {
            delete this.errors[field];
        } else {
            this.errors = {};
        }
    }
}

class Form {
    constructor(data){
        this.originalData = data;
        for(let field in data){
            this[field] = data[field];
        }
        this.errors = new Errors();
    }
    reset (){
        for(let field in this.originalData){
            this[field] = "";
        }
    }
    data(){
        let data = Object.assign({}, this); 

        delete data.originalData; 
        delete data.errors;

        return data;
    }
    submit(method, endpoint){
        axios[method](endpoint, this.data())
             .then(this.onSuccess.bind(this))
             .catch(this.onFail.bind(this));
    }
    onSuccess(response){
        alert(response.data.message);
        this.errors.clear();
        this.reset();
    }
    onFail(error){
        console.log(error.response.data.errors);
        this.errors.record(error.response.data.errors);
    }
}

var app = new Vue({
    el: "#root",
    data: {
        form : new Form({
            name : '', 
            description : ''
        })
    },
    methods:{
        onSubmit() {
            this.form.submit('post', '/task')
            // var data = this.$data;
            // axios.post("/task",data)
            //     .then(function(response){
            //         this.name = ""; 
            //         this.description = "";
            //     })
            //     .catch(error => this.form.errors.record(error.response.data.errors));
        }
    }
});
