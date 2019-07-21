import React, { Component } from 'react';
import { StyleSheet, Dimensions, Keyboard, TouchableWithoutFeedback } from 'react-native';
import { Container, Content, StyleProvider, View, Text, Button, H2, H1 } from 'native-base';
import DefaultInput from '../../components/UI/DefaultInput/DefaultInput';
import ButtonWithBackground from '../../components/UI/ButtonWithBackground/ButtonWithBackground';
import validate from '../../utility/validation';
import { connect } from 'react-redux';
import { tryAuth, authAutoSignIn } from '../../store/actions/index';
import getTheme from '../../../native-base-theme/components';
import material from '../../../native-base-theme/variables/material';
import platform from '../../../native-base-theme/variables/platform';
import firebase from 'react-native-firebase';
import { fcmCheckPermissions } from '../../store/actions/index';
import { RemoteMessage } from 'react-native-firebase';
import startMainTabs from '../MainTabs/startMainTabs';
import LoadingSpinner from '../../components/UI/LoadingSpinner/LoadingSpinner';

class AuthScreen extends Component {
	state = {
		viewMode: Dimensions.get('window').height > 500 ? 'portrait' : 'landscape',
		authMode: 'login',
		controls: {
			email: {
				value: '',
				valid: {
					status: false,
					message: ''
				},
				validationRules: {
					isEmail: true
				},
				touched: false
			},
			password: {
				value: '',
				valid: {
					status: false,
					message: ''
				},
				validationRules: {
					minLength: 6
				},
				touched: false
			},
			confirmPassword: {
				value: '',
				valid: {
					status: false,
					message: ''
				},
				validationRules: {
					equalTo: 'password'
				},
				touched: false
			}
		}
	};

	constructor(props) {
		super(props);
		Dimensions.addEventListener('change', this.updateStyles);
	}

	componentDidMount() {
		this.props.onAutoSignIn();
		this.props.onCheckPermission();
		this.createNotificationListeners();
	}

	componentWillUnmount() {
		Dimensions.removeEventListener('change', this.updateStyles);
		this.notificationListener();
		this.notificationOpenedListener();
	}

	createNotificationListeners() {
		this.notificationListener = firebase.notifications().onNotification((notification) => {
			// const { title, body } = notification;
			console.log('onNotification:');

			const localNotification = new firebase.notifications.Notification({
				show_in_foreground: true,
				show_in_background: true
			})
				.setNotificationId(notification.notificationId)
				.setTitle(notification.title)
				// .setSubtitle(notification.subtitle)
				.setBody(notification.body)
				.setData(notification.data)
				.setSound(channel.sound)
				.android.setChannelId('fcm_default_channel') // e.g. the id you chose above
				.android.setSmallIcon('@drawable/ic_launcher') // create this icon in Android Studio
				.android.setColor('#000000') // you can set a color here
				.android.setPriority(firebase.notifications.Android.Priority.High);
			// Build an action
			const action = new firebase.notifications.Android.Action('test_action', 'ic_launcher', 'My Test Action');

			// Build a remote input
			const remoteInput = new firebase.notifications.Android.RemoteInput('inputText').setLabel('Message');

			// Add the remote input to the action
			action.addRemoteInput(remoteInput);

			// Add the action to the notification
			localNotification.android.addAction(action);
			firebase.notifications().displayNotification(localNotification).catch((err) => console.error(err));
		});

		const channel = new firebase.notifications.Android.Channel(
			'fcm_default_channel',
			'Demo app name',
			firebase.notifications.Android.Importance.High
		)
			.setDescription('Demo app description')
			.setSound('sampleaudio.mp3');
		firebase.notifications().android.createChannel(channel);

		this.notificationOpenedListener = firebase.notifications().onNotificationOpened((notificationOpen) => {
			console.log('onNotificationOpened');
			// Get the action triggered by the notification being opened
			const action = notificationOpen.action;
			// Get information about the notification that was opened
			const notification = notificationOpen.notification;
			startMainTabs();
		});

		firebase.notifications().getInitialNotification().then((notificationOpen) => {
			if (notificationOpen) {
				// App was opened by a notification
				// Get the action triggered by the notification being opened
				const action = notificationOpen.action;
				// Get information about the notification that was opened
				const notification = notificationOpen.notification;
				console.log('getInitialNotification');
				startMainTabs();
			}
		});

		this.messageListener = firebase.messaging().onMessage((message) => {
			console.log(JSON.stringify(message));
		});
	}

	switchAuthModeHandler = () => {
		this.setState((prevState) => {
			return {
				authMode: prevState.authMode === 'login' ? 'signup' : 'login'
			};
		});
	};

	updateStyles = (dims) => {
		this.setState({
			viewMode: dims.window.height > 500 ? 'portrait' : 'landscape'
		});
	};

	authHandler = () => {
		const authData = {
			email: this.state.controls.email.value,
			password: this.state.controls.password.value
		};
		this.props.onTryAuth(authData, this.state.authMode);
	};

	updateInputState = (key, value) => {
		let connectedValue = {};
		if (this.state.controls[key].validationRules.equalTo) {
			const equalControl = this.state.controls[key].validationRules.equalTo;
			const equalValue = this.state.controls[equalControl].value;
			connectedValue = {
				...connectedValue,
				equalTo: equalValue
			};
		}

		if (key === 'password') {
			connectedValue = {
				...connectedValue,
				equalTo: value
			};
		}

		this.setState((prevState) => {
			return {
				controls: {
					...prevState.controls,
					confirmPassword: {
						...prevState.controls.confirmPassword,
						valid:
							key === 'password'
								? validate(
										prevState.controls.confirmPassword.value,
										prevState.controls.confirmPassword.validationRules,
										connectedValue
									)
								: prevState.controls.confirmPassword.valid
					},
					[key]: {
						...prevState.controls[key],
						value: value,
						valid: validate(value, prevState.controls[key].validationRules, connectedValue),
						touched: true
					}
				}
			};
		});
	};

	render() {
		let confirmPasswordControl = null;

		if (this.state.authMode === 'signup') {
			confirmPasswordControl = (
				<View
					style={
						this.state.viewMode === 'portrait' || this.state.authMode === 'login' ? (
							styles.portraitPasswordWrapper
						) : (
							styles.landscapePasswordWrapper
						)
					}
				>
					<DefaultInput
						placeholder="Confirm Password"
						style={[ styles.input ]}
						value={this.state.controls.confirmPassword.value}
						onChangeText={(val) => this.updateInputState('confirmPassword', val)}
						valid={this.state.controls.confirmPassword.valid.status}
						message={this.state.controls.confirmPassword.valid.message}
						touched={this.state.controls.confirmPassword.touched}
						secure={true}
						input={{
							autoCapitalize: 'none'
						}}
					/>
				</View>
			);
		}

		return (
			<StyleProvider style={getTheme(platform)}>
				<Container style={styles.container}>
					{this.props.isLoading ? <LoadingSpinner loading={this.props.isLoading} /> : null}
					<View style={styles.content}>
						<H1 style={styles.heading}>{this.state.authMode === 'login' ? 'Log In' : 'Create'}</H1>
						<H2 style={styles.subheading}>
							{this.state.authMode === 'login' ? 'with your account' : 'your account'}
						</H2>
						<TouchableWithoutFeedback onPress={Keyboard.dismiss}>
							<View style={styles.inputContainer}>
								<DefaultInput
									placeholder="Your Email Address"
									style={[ styles.input ]}
									value={this.state.controls.email.value}
									onChangeText={(val) => this.updateInputState('email', val)}
									valid={this.state.controls.email.valid.status}
									message={this.state.controls.email.valid.message}
									touched={this.state.controls.email.touched}
									input={{
										autoCapitalize: 'none',
										keyboardType: 'email-address'
									}}
								/>
								<View
									style={
										this.state.viewMode === 'portrait' || this.state.authMode === 'login' ? (
											styles.portraitPasswordContainer
										) : (
											styles.landscapePasswordContainer
										)
									}
								>
									<View
										style={
											this.state.viewMode === 'portrait' ? (
												styles.portraitPasswordWrapper
											) : (
												styles.landscapePasswordWrapper
											)
										}
									>
										<DefaultInput
											placeholder="Password"
											style={[ styles.input ]}
											value={this.state.controls.password.value}
											onChangeText={(val) => this.updateInputState('password', val)}
											valid={this.state.controls.password.valid.status}
											message={
												this.state.authMode === 'signup' ? (
													this.state.controls.password.valid.message
												) : null
											}
											touched={this.state.controls.password.touched}
											secure={true}
											input={{
												autoCapitalize: 'none'
											}}
										/>
									</View>
									{confirmPasswordControl}
								</View>
							</View>
						</TouchableWithoutFeedback>
						<View style={styles.authtype}>
							<Text style={{ marginRight: 7 }}>
								{this.state.authMode === 'login' ? (
									'Dont have an account ?'
								) : (
									'Already have an account ?'
								)}
							</Text>
							<ButtonWithBackground onPress={this.switchAuthModeHandler}>
								{this.state.authMode === 'login' ? 'Sign up' : 'Sign In'}
							</ButtonWithBackground>
						</View>
						<View style={styles.submitButton}>
							<Button
								block
								onPress={this.authHandler}
								disabled={
									(!this.state.controls.confirmPassword.valid.status &&
										this.state.authMode === 'signup') ||
									!this.state.controls.email.valid.status ||
									(!this.state.controls.password.valid.status && this.state.authMode === 'signup') ||
									!this.state.controls.password.value
								}
								success={
									!(
										(!this.state.controls.confirmPassword.valid.status &&
											this.state.authMode === 'signup') ||
										!this.state.controls.email.valid.status ||
										(!this.state.controls.password.valid.status &&
											this.state.authMode === 'signup') ||
										!this.state.controls.password.value
									)
								}
							>
								<Text>{this.state.authMode === 'login' ? 'Log In' : 'Register'}</Text>
							</Button>
						</View>
					</View>
				</Container>
			</StyleProvider>
		);
	}
}

const styles = StyleSheet.create({
	heading: {
		// fontWeight: '400',
		// fontSize: 27,
		// color: 'black',
		marginBottom: 7,
		textAlign: 'center'
	},
	subheading: {
		// fontSize: 18,
		marginBottom: 35,
		textAlign: 'center'
		// color: 'black',
	},
	container: {
		height: '100%',
		justifyContent: 'center',
		alignItems: 'center'
	},
	authtype: {
		marginTop: 10,
		flexDirection: 'row',
		justifyContent: 'center'
	},
	content: {
		width: '95%'
	},
	textContent: {
		flexDirection: 'row',
		justifyContent: 'center'
	},
	landscapePasswordContainer: {
		flexDirection: 'row',
		justifyContent: 'space-between'
	},
	portraitPasswordContainer: {
		flexDirection: 'column',
		justifyContent: 'flex-start'
	},
	portraitPasswordWrapper: {
		width: '100%'
	},
	landscapePasswordWrapper: {
		width: '45%'
	},
	submitButton: {
		marginLeft: 20,
		marginRight: 20,
		marginTop: 30
	}
});

const mapDispatchToProps = (dispatch) => {
	return {
		onTryAuth: (authData, authMode) => dispatch(tryAuth(authData, authMode)),
		onAutoSignIn: () => dispatch(authAutoSignIn()),
		onCheckPermission: () => dispatch(fcmCheckPermissions())
	};
};

const mapStateToProps = (state) => {
	return {
		isLoading: state.ui.isLoading
	};
};

export default connect(mapStateToProps, mapDispatchToProps)(AuthScreen);
