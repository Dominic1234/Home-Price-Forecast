import requests
import json
import time
import sys

def test_server_connection():
    """Test connection to the model server and try a prediction"""
    print("Testing connection to model server...")
    try:
        # Test single prediction
        test_data = {"features": [3111, 2029, 4, 3, 2, 2, 234112, 2500, 4]}
        response = requests.post("http://localhost:5000/predict", json=test_data)
        
        if response.status_code == 200:
            print("\n✓ SUCCESS: Server is running and responding correctly!")
            print("\nResponse from server:")
            print(json.dumps(response.json(), indent=2))
            return True
        else:
            print(f"\n✗ ERROR: Server responded with status code {response.status_code}")
            print(f"Response: {response.text}")
            return False
            
    except requests.exceptions.ConnectionError:
        print("\n✗ ERROR: Could not connect to the server at http://localhost:5000")
        print("Make sure the server is running by executing 'start_server.bat'")
        return False
        
    except Exception as e:
        print(f"\n✗ ERROR: {str(e)}")
        return False

def test_batch_prediction():
    """Test batch predictions with multiple feature sets"""
    print("\nTesting batch prediction functionality...")
    try:
        # Batch prediction test
        batch_data = {
            "features": [
                [3111, 2029, 1, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 2, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 3, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 4, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 5, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 6, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 7, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 8, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 9, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 10, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 11, 3, 2, 2, 234112, 2500, 4],
                [3111, 2029, 12, 3, 2, 2, 234112, 2500, 4]
            ]
        }
        
        response = requests.post("http://localhost:5000/predict", json=batch_data)
        
        if response.status_code == 200:
            print("✓ Batch prediction successful!")
            print("\nBatch prediction results:")
            print(json.dumps(response.json(), indent=2))
            return True
        else:
            print(f"✗ Batch prediction failed with status: {response.status_code}")
            print(f"Response: {response.text}")
            return False
            
    except Exception as e:
        print(f"✗ Error during batch prediction test: {str(e)}")
        return False

def run_tests():
    """Run all tests"""
    print("=" * 50)
    print("MODEL SERVER TEST SCRIPT")
    print("=" * 50)
    print("\nThis script tests the RandomForest model server.")
    
    # Test basic connection and prediction
    basic_test_passed = test_server_connection()
    
    # If basic test passed, try batch prediction
    if basic_test_passed:
        batch_test_passed = test_batch_prediction()
        
        if batch_test_passed:
            print("\n✓ All tests passed successfully!")
        else:
            print("\n⚠ Basic prediction works but batch prediction failed.")
    else:
        print("\n✗ Basic connection test failed. Please check the server.")

if __name__ == "__main__":
    run_tests()