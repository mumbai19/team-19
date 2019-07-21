import React, { Component, FlatList } from 'react';
import { View } from 'react-native';
import { Navigation } from 'react-native-navigation';
import { connect } from 'react-redux';

class Tab2 extends Component {
	componentDidMount() {
		console.log(this.props.onDonation);
		this.navigationEventListener = Navigation.events().bindComponent(this);
		const bottomTabEventListener = Navigation.events().registerBottomTabSelectedListener(
			({ selectedTabIndex, unselectedTabIndex }) => {}
		);
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
		return <View>{this.props.token}</View>;
	}
}

const mapStateToProps = (state) => {
	return {
		onDonation: state.don.donation
	};
};

export default connect(mapStateToProps, null)(Tab2);
