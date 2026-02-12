# Sentry SDK Fake Errors Test App

An isolated test application for generating and sending fake errors to Datadog through Sentry SDK integration.

## Features

- **Multiple Error Types**: Generate JavaScript, Type, Range, Syntax, and Custom errors
- **Sentry Integration**: Reports all errors directly to Datadog
- **Error Counter**: Track total errors sent
- **Batch Error Sending**: Send all error types at once
- **Clean UI**: Easy-to-use interface for testing

## Setup

### Installation

```bash
npm install
```

### Start the App

```bash
npm start
```

The app will be available at `http://localhost:3001`

## Sentry Configuration

- **DSN**: https://pub09cd3ed5ba924dda9a3d18b5427c5040@sentry-intake.datadoghq.com/1
- **Service**: readonly-SentrySDK-create-fake-errors
- **Version**: 1.0.0
- **Trace Sample Rate**: 100%

## Error Types

1. **JavaScript Error** - Standard error throwing
2. **Type Error** - Calling methods on null/undefined
3. **Range Error** - Invalid array length
4. **Syntax Error** - Invalid JSON parsing
5. **Custom Error** - Application-specific errors
6. **Info Message** - Informational messages

## Usage

1. Open `http://localhost:3001` in your browser
2. Click any error type button to send that specific error
3. Or click "Send All Error Types" to send multiple errors
4. Check your Datadog dashboard to see the errors captured
5. Errors appear under service: `readonly-SentrySDK-create-fake-errors`

## Monitoring

All errors sent from this app will appear in your Datadog dashboard under:
- Service: readonly-SentrySDK-create-fake-errors
- Environment: Production
- Version: 1.0.0

Each error includes full stack trace, timestamp, and context information for debugging and analysis.
