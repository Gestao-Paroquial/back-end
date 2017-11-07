import DashboardLayout from '../components/Dashboard/Layout/DashboardLayout.vue';
// GeneralViews
import NotFound from '../components/GeneralViews/NotFoundPage.vue';

// Admin pages
import Overview from 'src/components/Dashboard/Views/Overview.vue';
import UserProfile from 'src/components/Dashboard/Views/UserProfile.vue';
import Notifications from 'src/components/Dashboard/Views/Notifications.vue';
import Icons from 'src/components/Dashboard/Views/Icons.vue';
import Maps from 'src/components/Dashboard/Views/Maps.vue';
import Typography from 'src/components/Dashboard/Views/Typography.vue';
import TableList from 'src/components/Dashboard/Views/TableList.vue';
import Participantes from 'src/components/Dashboard/Views/Participantes.vue';
import Pastorais from 'src/components/Dashboard/Views/Pastorais.vue';
import Comunidades from 'src/components/Dashboard/Views/Comunidades.vue';

const routes = [
	{
		path: '/',
		component: DashboardLayout,
		redirect: '/admin/overview'
	},
	{
		path: '/admin',
		component: DashboardLayout,
		redirect: '/admin/stats',
		children: [
			{
				path: 'overview',
				name: 'overview',
				component: Overview
			},
			{
				path: 'participantes',
				name: 'participantes',
				component: Participantes
			},
			{
				path: 'pastorais',
				name: 'pastorais',
				component: Pastorais
			},
			{
				path: 'comunidades',
				name: 'comunidades',
				component: Comunidades
			},
			{
				path: 'stats',
				name: 'stats',
				component: UserProfile
			},
			{
				path: 'notifications',
				name: 'notifications',
				component: Notifications
			},
			{
				path: 'icons',
				name: 'icons',
				component: Icons
			},
			{
				path: 'maps',
				name: 'maps',
				component: Maps
			},
			{
				path: 'typography',
				name: 'typography',
				component: Typography
			},
			{
				path: 'table-list',
				name: 'table-list',
				component: TableList
			}
		]
	},
	{ path: '*', component: NotFound }
];

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes;
