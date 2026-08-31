# Afterhours Panel

Clean Windows desktop app for Horii Developments / safepurchase operations.

## Features

- Overview dashboard
- F3 hotkey for `Purchase Made`
- Local purchase ledger with daily/weekly/monthly totals
- Ticket notification surface with sound control
- Pterodactyl server/node overview surface
- Settings surface for future secure integrations

## Security

Pterodactyl API tokens and Discord credentials are deliberately not bundled in the app or repository. The secure backend bridge is required before live API data is enabled.

## Development

```bash
npm install
npm run build
npm run dev
```

Windows release builds run through GitHub Actions and produce NSIS `.exe` and MSI installers.
