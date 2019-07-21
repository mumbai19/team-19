import React from 'react';
import { StyleSheet, Text, View, Button, Picker, Alert } from 'react-native';
import { CreditCardInput } from 'react-native-credit-card-input';
import Icon from 'react-native-vector-icons/FontAwesome';
import DefaultInput from '../../components/UI/DefaultInput/DefaultInput';
import startMainTabs from '../../screens/MainTabs/startMainTabs';
import { connect } from 'react-redux';
import { storeDonation } from '../../store/actions';
import { Navigation } from 'react-native-navigation';
/**
 * Renders the payment form and handles the credit card data
 * using the CreditCardInput component.
 */
class PaymentFormView extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			cardData: { valid: false },
			amount: 0,
			category: '',
			email: 'farhan@gmail.com'
		};
	}
	onSubmit(creditCardInput, amount, category) {
		console.log(amount);
		console.log(category);
		console.log(creditCardInput);
		const { navigation } = this.props;
		// Disable the Submit button after the request is sent
		this.setState({ submitted: true });
		let creditCardToken;
		var randomNumber = Math.floor(Math.random() * 100000) + 1;
		try {
			// Create a credit card token
			// creditCardToken = await getCreditCardToken(creditCardInput);
			token = randomNumber;
			// if (creditCardToken.error) {
			// 	// Reset the state if Stripe responds with an error
			// 	// Set submitted to false to let the user subscribe again
			// 	this.setState({ submitted: false, error: STRIPE_ERROR });
			// 	return;
			// }
		} catch (e) {
			// Reset the state if the request was sent with an error
			// Set submitted to false to let the user subscribe again
			this.setState({ submitted: false, error: STRIPE_ERROR });
			return;
		}
		// Send a request to your server with the received credit card token
		// const { error } = await subscribeUser(creditCardToken);
		// Handle any errors from your server
		console.log('Inside on submit');

		if (creditCardInput.values.cvc != '123') {
			// this.setState({ submitted: false, error: SERVER_ERROR });
			startMainTabs();
			alert('Invalid credentials');
		} else {
			console.log(amount);
			console.log(this.state.email);
			console.log(token);
			console.log(category);
			// this.setState({
			// 	...this.state,
			// 	data: {
			// 		email: this.state.email,
			// 		amount: amount,
			// 		category: category,
			// 		token: token
			// 	}
			// });
			// this.props.onStoreDonation({
			// 	token: token,
			// 	data: {
			// 		email: this.state.email,
			// 		amount: amount,
			// 		category: category
			// 	}
			// });
			alert('Payment Sucessful. Token: ' + token + ' | Amount: Rs' + amount);
		}
	}
	render() {
		const { submitted, error } = this.props;
		return (
			<View>
				<View>
					<CreditCardInput
						requiresName
						onChange={(cd) => {
							this.setState({
								...this.state,
								cardData: cd
							});
						}}
						additionalInputsProps={{
							cvc: {
								secureTextEntry: true
							}
						}}
					/>
					<DefaultInput
						placeholder="Amount"
						style={[ styles.input ]}
						value={this.state.amount}
						input={{
							autoCapitalize: 'none'
						}}
						onChangeText={(val) => {
							this.setState({
								...this.state,
								amount: val
							});
						}}
					/>
					<Picker
						selectedValue={this.state.category}
						style={{ height: 50, width: '100%' }}
						onValueChange={(itemValue, itemIndex) => {
							console.log('Picker');
							console.log(itemValue);
							this.setState({
								...this.state,
								category: itemValue
							});
						}}
					>
						<Picker.Item label="Women Empowerment" value="women" />
						<Picker.Item label="Child" value="child" />
					</Picker>
				</View>
				<View style={styles.buttonWrapper}>
					<Button
						title="Subscribe"
						disabled={!this.state.cardData.valid || submitted}
						onPress={() => {
							this.onSubmit(this.state.cardData, this.state.amount, this.state.category);
						}}
					/>
				</View>
			</View>
		);
	}
}
const styles = StyleSheet.create({
	container: {
		flex: 1,
		alignItems: 'center'
	},
	buttonWrapper: {
		padding: 10,
		zIndex: 100
	},
	alertTextWrapper: {
		flex: 20,
		justifyContent: 'center',
		alignItems: 'center'
	},
	alertIconWrapper: {
		padding: 5,
		flex: 4,
		justifyContent: 'center',
		alignItems: 'center'
	},
	alertText: {
		color: '#c22',
		fontSize: 16,
		fontWeight: '400'
	},
	alertWrapper: {
		backgroundColor: '#ecb7b7',
		justifyContent: 'space-between',
		alignItems: 'center',
		flexDirection: 'row',
		flexWrap: 'wrap',
		borderRadius: 5,
		paddingVertical: 5,
		marginTop: 10
	}
});

const mapDispatchToProps = () => {
	return {
		onStoreDonation: (info) => storeDonation({ token: info.token, data: info.data })
	};
};

export default connect(null, mapDispatchToProps)(PaymentFormView);
