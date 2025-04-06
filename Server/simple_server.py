# simple_server.py
from flask import Flask, request, jsonify
import pickle
import numpy as np
from sklearn.ensemble import RandomForestRegressor

app = Flask(__name__)

# Create and save model if it doesn't exist
try:
    with open('rf_model.pkl', 'rb') as f:
        model = pickle.load(f)
    print("Model loaded successfully!")
except FileNotFoundError:
    print("Creating new model...")
    # Sample data - replace with your actual training data
    X_sample = np.random.rand(100, 10)
    y_sample = np.random.rand(100)
    
    # Your specified model parameters
    model = RandomForestRegressor(n_estimators=200, max_depth=20, random_state=42)
    model.fit(X_sample, y_sample)
    
    # Save model
    with open('rf_model.pkl', 'wb') as f:
        pickle.dump(model, f)
    print("Model created and saved!")

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json
    
    if not data or 'features' not in data:
        return jsonify({'error': 'Please provide features'}), 400
        
    features = np.array(data['features'])
    
    # Handle both single predictions and batch predictions
    if features.ndim == 1:
        features = features.reshape(1, -1)
        
    predictions = model.predict(features).tolist()
    
    return jsonify({
        'predictions': predictions
    })

if __name__ == '__main__':
    print("Starting server on http://localhost:5000")
    app.run(debug=True, host='0.0.0.0', port=5000)