import React, { PureComponent } from 'react';
import { AppRegistry, StyleSheet, Text, TouchableOpacity, View } from 'react-native';
import { RNCamera } from 'react-native-camera';

class QRCodePage extends PureComponent {
	constructor(props) {
		super(props);
		this.state = {
			qrcode: ''
		};
	}

	onBarCodeRead = (e) => {
		console.log(e);
		str = e.data;
		pan = str.slice(str.length - 10, str.length);
		console.log(pan);
	};

	render() {
		return (
			<View style={styles.container}>
				<RNCamera
					barCodeTypes={[ RNCamera.Constants.BarCodeType.qr ]}
					flashMode={RNCamera.Constants.FlashMode.on}
					style={styles.preview}
					onBarCodeRead={this.onBarCodeRead}
					ref={(cam) => (this.camera = cam)}
				/>
			</View>
		);
	}
}
const styles = StyleSheet.create({
	container: {
		flex: 1,
		flexDirection: 'row'
	},
	preview: {
		flex: 1,
		justifyContent: 'flex-end',
		alignItems: 'center'
	}
});

export default QRCodePage;
