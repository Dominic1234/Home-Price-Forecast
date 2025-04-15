# Home-Price-Forecast
Home Price Forecast is a webapp to predict the value of a property using ML trained on historical house pricing data using factors such as the location, no. of rooms, etc.

# To setup model on Colab
1. Download dataset from kaggle or use the csv file in the github data directory.
2. Move the csv to your google drive home folder and run the colab code.
3. Download the scaler.pkl and rf_model.pkl files and move them to the Server\ folder

# To Setup the Server
1. Open the google colab link and download the saved model and scaler if not available in the Github files and move the pkl file to Server folder in repository.
2. Open command line and navigate to the Server folder within the repository.
3. Execute setup_model_server.bat and follow the instructions.

# To Setup Website
1. Download and install XAMPP.
2. Move website folder to ~XAMPP/htdocs/
3. Run Apache server in XAMPP Control Panel
4. Open localhost/Website/index.php

# Links
1. Colab model: https://colab.research.google.com/drive/1IggzbhEVKr9RnqI8RjFlIgD0LDtNVfC6?usp=sharing
2. XAMPP: https://www.apachefriends.org/
3. Dataset: https://www.kaggle.com/datasets/dansbecker/melbourne-housing-snapshot