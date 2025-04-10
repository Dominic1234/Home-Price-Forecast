# simple_server.py
from flask import Flask, request, jsonify
import joblib
import numpy as np
from sklearn.ensemble import RandomForestRegressor

app = Flask(__name__)

# Create and save model if it doesn't exist
try:
    with open('rf_model.pkl', 'rb') as f:
        model = joblib.load(f)
    print("Model loaded successfully!")
except FileNotFoundError:
    print("Creating new model...")
    # Sample data - replace with your actual training data
    X_sample = np.random.rand(100, 8) # 100 samples, 8 features
    y_sample = np.random.rand(100)
    
    # Your specified model parameters
    model = RandomForestRegressor(n_estimators=200, max_depth=20, random_state=42)
    model.fit(X_sample, y_sample)
    
    # Save model
    with open('rf_model.pkl', 'wb') as f:
        joblib.dump(model, f)
    print("Model created and saved!")

try:
    with open('scaler.pkl', 'rb') as f:
        scaler = joblib.load(f)
    print("Scaler loaded successfully!")
except FileNotFoundError:
    print("Creating new scaler...")
    # Create a sample scaler - replace with your actual training data
    from sklearn.preprocessing import StandardScaler
    
    X_sample = np.random.rand(100, 8)
    scaler = StandardScaler()
    scaler.fit(X_sample)
    
    # Save scaler
    with open('scaler.pkl', 'wb') as f:
        joblib.dump(scaler, f)
    print("Scaler created and saved!")


@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    
    if not data or 'features' not in data:
        return jsonify({'error': 'Please provide features'}), 400
        
    features = np.array(data['features'])
    
    # Handle both single predictions and batch predictions
    if features.ndim == 1:
        features = features.reshape(1, -1)
        
    scaled_features = scaler.transform(features)

    predictions = model.predict(scaled_features).tolist()
    
    return jsonify({
        'predictions': predictions
    })

if __name__ == '__main__':
    print("Starting server on http://localhost:5000")
    app.run(debug=True, host='0.0.0.0', port=5000)