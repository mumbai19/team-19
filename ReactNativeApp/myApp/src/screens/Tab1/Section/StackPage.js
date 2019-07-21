import React, { Component } from 'react';
import { BackHandler, StyleSheet } from 'react-native';
import {
	Container,
	Header,
	Content,
	Card,
	CardItem,
	Icon,
	Right,
	Fab,
	Button,
	View,
	StyleProvider,
	Form,
	Item,
	Label,
	Input,
	Text
} from 'native-base';
import { Navigation } from 'react-native-navigation';
import getTheme from '../../../../native-base-theme/components';
import material from '../../../../native-base-theme/variables/material';
import platform from '../../../../native-base-theme/variables/platform';
import { Col, Row, Grid } from 'react-native-easy-grid';
import DefaultInput from '../../../components/UI/DefaultInput/DefaultInput';

class StackPage extends Component {
	componentDidMount() {
		this.backHandler = BackHandler.addEventListener('hardwareBackPress', () => {
			Navigation.pop(this.props.componentId);
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
	componentWillMount() {}

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

	state = {
		active: false,
		username: ''
	};

	render() {
		return (
			<StyleProvider style={getTheme(platform)}>
				<Container style={styles.container}>
					<View>
						<DefaultInput placeholder="Your Email Address" />
						<View>
							<Item
								floatingLabel
								success
								style={[
									styles.customInput,
									this.props.style,
									!this.props.valid && this.props.touched ? error : null
								]}
								{...this.props}
							>
								<Label>Username</Label>
								<Input
									style={styles.input}
									onBlur={() => this.onBlur()}
									onFocus={() => this.onFocus()}
								/>
							</Item>
							<Label style={styles.label}>Erroo</Label>
						</View>
						<View>
							<Item floatingLabel style={styles.customInput}>
								<Label>Password</Label>
								<Input style={styles.input} />
							</Item>
						</View>
					</View>
				</Container>
			</StyleProvider>
		);
	}
}
const styles = StyleSheet.create({
	container: {
		flexDirection: 'column',
		justifyContent: 'center',
		borderColor: 'red'
	},
	input: {
		marginTop: 10
	},
	label: {
		textAlign: 'right',
		marginRight: 20,
		fontSize: 13,
		color: 'red'
	},
	customInput: {
		marginLeft: 20,
		marginRight: 20
	},
	invalid: {
		backgroundColor: '#f9c0c0',
		borderColor: 'red'
	}
});

export default StackPage;
