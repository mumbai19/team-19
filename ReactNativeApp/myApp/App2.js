import React from 'react';
import { StyleSheet, Text, View, TextInput, Button } from 'react-native';
import ListItem from './src/components/ListItem/ListItem';
import PlaceList from './src/components/PlaceList/PlaceList';
import placeImage from './assets/download.jpeg';
import PlaceDetail from './src/components/PlaceDetail/PlaceDetail';
import PlaceInput from './src/components/PlaceInput/PlaceInput';
import { connect } from 'react-redux';
import { addPlace, deletePlace, selectPlace, deselectPlace } from './src/store/actions/index';

class App extends React.Component {
  
  render() {

    return (
      <View style={styles.container}>
        <PlaceDetail selectedPlace={this.props.selectedPlace} onItemDeleted={this.props.onDeletePlace} onModalClosed={this.props.onDeselectPlace} />
        <PlaceInput onPlaceAdded={this.props.onAddPlace} />
        <PlaceList places={this.props.places} onItemSelected={this.props.onSelectPlace} />
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 26,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'flex-start',
  },
});

const mapStateToProps = state => ({
    places: state.places.places,
    selectedPlace: state.places.selectedPlace,
  });

const mapDispatchToProps = dispatch => {
  return {
    onAddPlace: (name) => dispatch(addPlace(name)),
    onDeletePlace: () => dispatch(deletePlace()),
    onSelectPlace: (key) => dispatch(selectPlace(key)),
    onDeselectPlace: () => dispatch(deselectPlace()),
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(App);
