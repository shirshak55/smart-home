# Smart Home
IOT based project towards making smart city. See image at bottom for visualization of app.

# Features
Smart Power
  - Ability to control light off and on remotly
  - Ability to turn on light by using our schedular
  - Ability to turn off light by using our schedular
  - Weather Statistics using openapi. 
  
Smart Water
    - Ability to check water at tank level
    - Live update on dashboard
    
# Future Plans
- Remove Laravel Nova and use some opensource project like Backpack for Laravel which can be used by anyone at least for testing the app
- Smart Security e.g. Like ability to detect if some one is appearing near door at night time
- Notifications on mobile, email etc.
- Testing
- By using weather api we can turn off fan if the temperature is low 

We got many plan so are you ready to help us 


> Please support by donating so that I can pay full time on such project making your life easier

# Images
![Raspberry Pi][images/pi_setup.png]
![Smart Power Home][images/smart_power.png]
![Smart Weather][images/smart_weather.png]

# Architecture
- Uses Laravel for server
- Uses Lumen for raspberry pi. As of now lumen is just used to get status of pin and set the pin to desired state. But I believe we can do more  
- Launch Script at root folder is used to set smart system :D

# Some Irks
- I wanted to use lumen 5.7 but due to php requirement I had to fallback to lumen 5.5 and even delete composer.lock file . I think if someone is able to install php7.1 or 7.2 then we can use latest version of lumen
# Contributing
PR are welcome and issue is good :)

# Licence
MIT

# Apply For Maintainer
> I care about the code :) And I will always be maintaing but as a opensource project I am expecting someone dedicately handle it too :) If you want to apply please open issue

Thank You

Shirshak Bajgain
