package com.myapp;
import com.oblador.vectoricons.VectorIconsPackage;

import android.app.Application;

import com.facebook.react.ReactApplication;
import io.invertase.firebase.RNFirebasePackage;
import com.oblador.vectoricons.VectorIconsPackage;
import com.airbnb.android.react.maps.MapsPackage;
import com.imagepicker.ImagePickerPackage;
import com.facebook.react.ReactNativeHost;
import com.facebook.react.ReactPackage;
import com.facebook.react.shell.MainReactPackage;
import com.facebook.soloader.SoLoader;

import com.reactnativenavigation.NavigationApplication;
import com.reactnativenavigation.react.NavigationReactNativeHost;
import com.reactnativenavigation.react.ReactGateway;

import java.util.Arrays;
import java.util.List;

import com.airbnb.android.react.maps.MapsPackage;
import com.imagepicker.ImagePickerPackage;

import io.invertase.firebase.messaging.RNFirebaseMessagingPackage;
import io.invertase.firebase.notifications.RNFirebaseNotificationsPackage;

import org.reactnative.camera.RNCameraPackage;

public class MainApplication extends NavigationApplication implements ReactApplication {

      @Override
      protected ReactGateway createReactGateway() {
          ReactNativeHost host = new NavigationReactNativeHost(this, isDebug(), createAdditionalReactPackages()) {
              @Override
              protected String getJSMainModuleName() {
                  return "index";
              }
          };
          return new ReactGateway(this, isDebug(), host);
      }

      @Override
      public boolean isDebug() {
          return BuildConfig.DEBUG;
      }

      protected List<ReactPackage> getPackages() {
          return Arrays.<ReactPackage>asList(
              new VectorIconsPackage(),
              new MainReactPackage(),
            new RNFirebasePackage(),
            new MapsPackage(),
            new ImagePickerPackage(),
                  new RNFirebaseMessagingPackage(),
                  new RNFirebaseNotificationsPackage(),
                  new RNCameraPackage()
          );
      }

    @Override
      public List<ReactPackage> createAdditionalReactPackages() {
        return getPackages();
      }

  }
