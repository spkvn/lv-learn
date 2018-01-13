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
        delete this.errors[field];
    }
}

var app = new Vue({
    el: "#root",
    data: {
        name : "",
        description: "",
        errors : new Errors()
    },
    methods:{
        onSubmit() {
            var data = this.$data;
            axios.post("/task",data)
                .then(function(response){
                    this.name = ""; 
                    this.description = "";
                })
                .catch(error => this.errors.record(error.response.data.errors));
        }
    }
});
