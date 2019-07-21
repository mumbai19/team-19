import React, { Component } from 'react';
import { TextInput, StyleSheet } from 'react-native';
import { View, Item, Label, Input } from 'native-base';

class DefaultInput extends Component {
	state = {
		borderColor: '#bbb'
	};

	onFocus = () => {
		this.setState({
			borderColor: '#841584'
		});
	};

	onBlur = () => {
		this.setState({
			borderColor: '#bbb'
		});
	};

	render() {
		return (
			<View>
				<Item
					floatingLabel
					style={[ styles.customInput, this.props.style, { borderColor: this.state.borderColor } ]}
				>
					<Label>{this.props.placeholder}</Label>
					<Input
						style={styles.input}
						value={this.props.value}
						onBlur={() => this.onBlur()}
						onFocus={() => this.onFocus()}
						onChangeText={this.props.onChangeText}
						secureTextEntry={this.props.secure}
						{...this.props.input}
					/>
				</Item>
				<Label style={styles.label}>
					{!this.props.valid && this.props.touched ? this.props.message : null}
				</Label>
			</View>
		);
	}
}

const styles = StyleSheet.create({
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
	}
});

export default DefaultInput;
