@echo off
echo ========================================
echo   Model Server Setup Script
echo ========================================
echo.

:: Check if Python is installed
python --version > nul 2>&1
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Python is not installed or not in PATH.
    echo Please install Python from https://www.python.org/downloads/
    pause
    exit /b 1
)

:: Check if simple_server.py exists
if not exist simple_server.py (
    echo ERROR: simple_server.py not found in the current directory.
    echo Please ensure the file exists in the same directory as this script.
    pause
    exit /b 1
)

echo simple_server.py found. Continuing setup...

:: Check if test_model.py exists
if not exist test_model.py (
    echo ERROR: test_model.py not found in the current directory.
    echo Please ensure the file exists in the same directory as this script.
    pause
    exit /b 1
)

echo test_model.py found. Continuing setup...

:: Create and activate virtual environment
echo Creating virtual environment...
if not exist venv (
    python -m venv venv
    echo Virtual environment created.
) else (
    echo Using existing virtual environment.
)

:: Activate virtual environment and install dependencies
call venv\Scripts\activate
echo Installing required packages...
pip install flask scikit-learn numpy requests

:: Create launcher batch files
echo Creating launcher scripts...

:: Start server batch file
echo @echo off > start_server.bat
echo title RandomForest Model Server >> start_server.bat
echo echo Starting model server on localhost:5000... >> start_server.bat
echo echo Press Ctrl+C to stop the server >> start_server.bat
echo. >> start_server.bat
echo call venv\Scripts\activate >> start_server.bat
echo python simple_server.py >> start_server.bat
echo pause >> start_server.bat

:: Test server batch file
echo @echo off > test_server.bat
echo title Model Server Test >> test_server.bat
echo echo Running model server tests... >> test_server.bat
echo. >> test_server.bat
echo call venv\Scripts\activate >> test_server.bat
echo python test_model.py >> test_server.bat
echo pause >> test_server.bat

echo.
echo Setup complete!
echo.
echo To start the server: start_server.bat
echo To test the server: test_server.bat
echo.
echo Would you like to start the server now? (Y/N)
set /p start_now=

if /i "%start_now%"=="Y" (
    echo.
    echo Starting server in a new window and running tests...
    start "RandomForest Model Server" cmd /c start_server.bat
    
    :: Wait for the server to initialize
    echo Waiting for server to start...
    timeout /t 5 /nobreak > nul
    
    :: Run the tests
    call test_server.bat
) else (
    echo.
    echo Setup finished. Use the batch files to start and test the server.
)

pause