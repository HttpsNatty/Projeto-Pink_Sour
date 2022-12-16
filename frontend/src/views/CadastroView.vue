<template>
    <div>
        <input type="text" name="username" id="username-input" placeholder="Digite o nome do usuário" v-model="formData.name">
<input type="email" name="email" id="email-input" placeholder="Digite o email do usuário" v-model="formData.email">
<form v-on:submit.prevent="addUser(formData)">
    </div>
</template>


<script>
import axios from "axios";
const api = axios.create({
 baseURL: "http://localhost:8080/api/",
});
export default {
    name: 'EntrarTela',
    
    data(){
        return {
            formData:{},
            error: {
                validate:false,
                message:'',
            }
        }
    },
    
   async created() {

	let results = await axios.get('http://localhost:8000/api/clientes');

	this.clientes = results.data;

},
async addUser(data) {

	if (!data.name) {
		alert('Informe o nome');
	} else if (!data.email) {
		alert('Informe o email');
	} else {

		let results = await axios.post(`${server}/clientes`, data);

		this.clientes.push({
			id: results.data.id,
			name: results.data.name,
			email: results.data.email
		});

	}

}
}
</script>