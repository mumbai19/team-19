import React from 'react';
import { StyleSheet, Text, View, ScrollView } from 'react-native';
import KeyboardSpacer from 'react-native-keyboard-spacer';
import PaymentFormView from './PaymentFormView';
import { connect } from 'react-redux';
import { storeDonation } from '../../store/actions';
/**
 * The class renders a view with PaymentFormView
 */
class AddSubscriptionView extends React.Component {
	render() {
		return (
			<View style={styles.container}>
				<View style={styles.cardFormWrapper}>
					<PaymentFormView {...this.props} />
				</View>
			</View>
		);
	}
}
const styles = StyleSheet.create({
	container: {
		flex: 1,
		justifyContent: 'center'
	},
	textWrapper: {
		margin: 10
	},
	infoText: {
		fontSize: 18,
		textAlign: 'center'
	},
	cardFormWrapper: {
		padding: 10,
		margin: 10
	}
});
const mapDispatchToProps = () => {
	return {
		onStoreDonation: (info) => storeDonation({ token: info.token, data: info.data })
	};
};

export default connect(null, mapDispatchToProps)(AddSubscriptionView);
