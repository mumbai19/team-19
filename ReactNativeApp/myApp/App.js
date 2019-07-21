import { Navigation } from 'react-native-navigation';
import AuthScreen from './src/screens/Auth/Auth';
import Tab1 from './src/screens/Tab1/Tab1';
import Tab2 from './src/screens/Tab2/Tab2';
import NewPage from './src/screens/Tab1/Section/NewPage';
import StackPage from './src/screens/Tab1/Section/StackPage';
import QRCodePage from './src/screens/Tab1/Section/QRCodePage';

import SideDrawer from './src/screens/SideDrawer/SideDrawer';
import { Provider } from 'react-redux';

import configureStore from './src/store/configureStore';
import AddSubscription from './src/screens/Payment/AddSubscription';
import AddSubscriptionView from './src/screens/Payment/AddSubscriptionView';
import PaymentFormView from './src/screens/Payment/PaymentFormView';

const store = configureStore();

Navigation.registerComponentWithRedux('myApp.AuthScreen', () => AuthScreen, Provider, store);
Navigation.registerComponentWithRedux('myApp.SideDrawer', () => SideDrawer, Provider, store);
Navigation.registerComponentWithRedux('myApp.Tab1', () => Tab1, Provider, store);
Navigation.registerComponentWithRedux('myApp.Tab2', () => Tab2, Provider, store);
Navigation.registerComponentWithRedux('Section.NewPage', () => NewPage);
Navigation.registerComponentWithRedux('Section.StackPage', () => StackPage);
Navigation.registerComponentWithRedux('Section.QRCodePage', () => QRCodePage);
Navigation.registerComponentWithRedux('AddSubscription', () => AddSubscription, Provider, store);
Navigation.registerComponentWithRedux('AddSubscriptionView', () => AddSubscriptionView, Provider, store);
Navigation.registerComponentWithRedux('PaymentFormView', () => PaymentFormView, Provider, store);

const App = () => {
	Navigation.setRoot({
		root: {
			stack: {
				children: [
					{
						component: {
							name: 'myApp.AuthScreen',
							passProps: {
								text: 'stack with one child'
							}
						}
					}
				],
				options: {
					topBar: {
						title: {
							text: 'Login'
						}
					}
				}
			}
		}
	});
	// myApp.AuthScreen
};
App();

export default App;
