import Panel from './components/Panel';
import Producto from './components/Producto';

export default {
	mode: 'history',

	routes: [
			{
				path: '/panel',
				component: Panel
			},

			{
				path: '/producto',
				component: Producto
			},

	]
};