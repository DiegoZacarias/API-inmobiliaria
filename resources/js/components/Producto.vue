<template>
	
				<!-- <h1>Lista de todos los productos</h1>
				<br> -->
				 <v-card>
    <v-card-title>
      Todos los productos
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="productos"
      :search="search"
    ></v-data-table>
  </v-card>

  

		
</template>

<!-- script>
	
	export default {};

</script> -->

<script>
  export default {
    data () {
      return {
        search: '',
       	headers: [
	       		{
	            text: 'Nombre',
	            align: 'start',
	            sortable: false,
	            value: 'nombre',
	          },
       			{ text: 'Direccion', value: 'direccion' },
       			{ text: 'Visible', value: 'visible' },
       			{ text: 'Banos', value: 'banos' },
       	],
        productos: [],
      }
    },
    methods: {
    	
    	getProductos(){
    		 axios.get("api/productos")
    		  .then((response)=> {
    		  						console.log('PARA EL BACKEND');
                      console.log(response.data); 
                      this.productos = response.data;   
                  });
     
    	},

    },
    created() {
    		this.getProductos();
    }
  }
</script>
