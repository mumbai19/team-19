import React, { Component } from 'react';
import { StyleSheet, View, Modal, ActivityIndicator } from 'react-native';
import { connect } from 'react-redux';
import { Spinner } from 'native-base';

class ActivityIndicatorScreen extends Component {
	render() {
		return (
			<Modal
				transparent={true}
				animationType={'none'}
				visible={this.props.loading}
				onRequestClose={() => {
					console.log('close modal');
				}}
			>
				<View style={styles.modalBackground}>
					<View style={styles.activityIndicatorWrapper}>
						<Spinner size={100} animating={this.props.loading} color="green" />
					</View>
				</View>
			</Modal>
		);
	}
}

const styles = StyleSheet.create({
	modalBackground: {
		flex: 1,
		alignItems: 'center',
		flexDirection: 'column',
		justifyContent: 'space-around',
		backgroundColor: '#000000CC'
	},
	activityIndicatorWrapper: {
		height: 500,
		width: 500,
		borderRadius: 10,
		display: 'flex',
		alignItems: 'center',
		justifyContent: 'space-around'
	}
});

export default ActivityIndicatorScreen;
