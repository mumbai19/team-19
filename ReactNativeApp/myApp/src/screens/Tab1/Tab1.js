import React, { Component } from 'react';
import { View, Button, Text, BackHandler } from 'react-native';
import { Navigation } from 'react-native-navigation';

class Tab1 extends Component {
	componentDidMount() {
		this.navigationEventListener = Navigation.events().bindComponent(this);
	}

	componentWillUnmount() {
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
				<Text>Tab1</Text>
				<Button
					onPress={() => {
						Navigation.push(this.props.componentId, {
							component: {
								name: 'Section.NewPage'
							}
						});
					}}
					title="Normal Push"
				/>
				<Button
					onPress={() => {
						Navigation.setRoot({
							root: {
								stack: {
									id: 'AppStack',
									children: [
										{
											component: {
												id: 'Section.NewPage',
												name: 'Section.NewPage',
												option: {
													topBar: {
														title: {
															text: 'Welcome'
														}
													}
												}
											}
										}
									]
								}
							}
						});
					}}
					title="Set Button"
				/>
			</View>
		);
	}
}

export default Tab1;
