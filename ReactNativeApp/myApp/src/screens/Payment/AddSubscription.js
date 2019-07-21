/**
 * The main class that submits the credit card data and
 * handles the response from Stripe.
 */
import React from 'react';
import AddSubscriptionView from './AddSubscriptionView';
const STRIPE_ERROR = 'Payment service error. Try again later.';
const SERVER_ERROR = 'Server error. Try again later.';
const STRIPE_PUBLISHABLE_KEY = '';
import startMainTabs from '../../screens/MainTabs/startMainTabs';
import { connect } from 'react-redux';
import { storeDonation } from '../../store/actions';
import { Navigation } from 'react-native-navigation';

class AddSubscription extends React.Component {
	componentWillReceiveProps(props) {
		console.log('In add subscription');
	}
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
	getCreditCardToken(creditCardData) {
		const card = {
			'card[number]': creditCardData.values.number.replace(/ /g, ''),
			'card[exp_month]': creditCardData.values.expiry.split('/')[0],
			'card[exp_year]': creditCardData.values.expiry.split('/')[1],
			'card[cvc]': creditCardData.values.cvc
		};
		console.log(card);
		return fetch('https://api.stripe.com/v1/tokens', {
			headers: {
				// Use the correct MIME type for your server
				Accept: 'application/json',
				// Use the correct Content Type to send data to Stripe
				'Content-Type': 'application/x-www-form-urlencoded',
				// Use the Stripe publishable key as Bearer
				Authorization: `Bearer ${STRIPE_PUBLISHABLE_KEY}`
			},
			// Use a proper HTTP method
			method: 'post',
			// Format the credit card data to a string of key-value pairs
			// divided by &
			body: Object.keys(card).map((key) => key + '=' + card[key]).join('&')
		}).then((response) => response.json());
	}
	/**
	 * The method imitates a request to our server.
	 *
	 * @param creditCardToken
	 * @return {Promise<Response>}
	 */
	subscribeUser(creditCardToken) {
		return new Promise((resolve) => {
			console.log('Credit card token\n', creditCardToken);
			alert('User subscribed');
		});
	}

	constructor(props) {
		super(props);
		this.state = {
			submitted: false,
			error: null,
			email: 'farhan@gmail.com',
			data: null
		};
	}

	// Handles submitting the payment request

	// render the subscription view component and pass the props to it
	render() {
		const { submitted, error } = this.state;
		let cont;
		if (this.state.data) {
			cont = () => {
				return (
					<View>
						<Text>{this.state.token}</Text>
					</View>
				);
			};
		}

		return this.state.data ? (
			<cont />
		) : (
			<AddSubscriptionView error={error} submitted={submitted} onSubmit={this.onSubmit} />
		);
	}
}
const mapDispatchToProps = () => {
	return {
		onStoreDonation: (info) => storeDonation({ token: info.token, data: info.data })
	};
};

export default connect(null, mapDispatchToProps)(AddSubscription);
