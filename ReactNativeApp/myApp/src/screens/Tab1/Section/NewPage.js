import React, { Component } from 'react';
import { View, Text, Button, BackHandler } from 'react-native';
import { Navigation } from 'react-native-navigation';
import startMainTabs from '../../MainTabs/startMainTabs';

class NewPage extends Component {
	componentDidMount() {
		this.backHandler = BackHandler.addEventListener('hardwareBackPress', () => {
			startMainTabs();
			return true;
		});
		this.navigationEventListener = Navigation.events().bindComponent(this);
	}

	componentWillUnmount() {
		this.backHandler.remove();
		// Not mandatory
		if (this.navigationEventListener) {
			this.navigationEventListener.remove();
		}
	}

	navigationButtonPressed({ buttonId }) {
		if (buttonId === 'sideDrawerToggle') {
			Navigation.mergeOptions(this.props.componentId, {
				sideMenu: {
					left: {
						visible: true
					}
				}
			});
		}
	}

	componentDidDisappear() {
		Navigation.mergeOptions(this.props.componentId, {
			sideMenu: {
				left: {
					visible: false
				}
			}
		});
	}

	render() {
		return (
			<View>
				<Text>NewPage</Text>
				<Button
					onPress={() => {
						Navigation.push(this.props.componentId, {
							component: {
								name: 'Section.StackPage'
							}
						});
					}}
					title="Push on stack"
				/>
				<Button
					onPress={() => {
						Navigation.push(this.props.componentId, {
							component: {
								name: 'Section.QRCodePage'
							}
						});
					}}
					title="QR Code"
				/>
			</View>
		);
	}
}

export default NewPage;
