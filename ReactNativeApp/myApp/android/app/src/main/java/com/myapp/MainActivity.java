package com.myapp;

import com.imagepicker.permissions.OnImagePickerPermissionsCallback;
import com.facebook.react.modules.core.PermissionListener;

import com.reactnativenavigation.NavigationActivity;

public class MainActivity extends NavigationActivity implements OnImagePickerPermissionsCallback {
  private PermissionListener listener; // <- add this attribute

  // Your methods here

  // Copy from here

  @Override
  public void setPermissionListener(PermissionListener listener)
  {
    this.listener = listener;
  }

  @Override
  public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults)
  {
    if (listener != null)
    {
      listener.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }
    super.onRequestPermissionsResult(requestCode, permissions, grantResults);
  }
}
