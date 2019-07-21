import { Navigation } from 'react-native-navigation';
import Icon from 'react-native-vector-icons/Ionicons';

const startTabs = () => {
	Promise.all([
		Icon.getImageSource('md-map', 30),
		Icon.getImageSource('ios-share-alt', 30),
		Icon.getImageSource('ios-menu', 30)
	]).then((sources) => {
		Navigation.setRoot({
			root: {
				stack: {
					children: [
						{
							component: {
								name: 'AddSubscription'
							}
						}
					],
					options: {
						bottomTab: {
							text: 'Donate',
							icon: sources[0],
							testID: 'FIRST_TAB_BAR_BUTTON'
						},
						topBar: {
							title: {
								text: 'Donate'
							},
							leftButtons: [
								{
									id: 'sideDrawerToggle',
									icon: sources[2]
								}
							]
						}
					}
				}
			}
		});
	});
};

export default startTabs;
