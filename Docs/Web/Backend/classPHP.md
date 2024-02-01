# Classes PHP elefanto

### Class User

The base class `User` might include common user information such as the user ID, username, email, and password.

**Attributes:**
- `userId: int`
- `username: string`
- `email: string`
- `password: string`

**Methods:**
- `__construct(username: string, email: string, password: string): void`
- `getUserId(): int`
- `getUsername(): string`
- `getEmail(): string`
- `setPassword(password: string): void`

### Class Owner (inherits from User)

The `Owner` class extends the `User` class and could contain owner-specific information such as contact details and the list of owned pets.

**Additional Attributes:**
- `contactNumber: string`
- `pets: array[Pet]`

**Additional Methods:**
- `__construct(username: string, email: string, password: string, contactNumber: string): void`
- `getContactNumber(): string`
- `addPet(pet: Pet): void`
- `getPets(): array[Pet]`

### Class Care

The `Care` class might represent a care record with details like the date, associated caregiver, and notes.

**Attributes:**
- `careId: int`
- `date: string`
- `notes: string`
- `pet: Pet`
- `caregiver: Owner`

**Methods:**
- `__construct(date: string, notes: string, pet: Pet, caregiver: Owner): void`
- `getCareId(): int`
- `getDate(): string`
- `getNotes(): string`
- `getPet(): Pet`
- `getCaregiver(): Owner`

### Class Pet

The `Pet` class could represent a pet with details like the pet ID, name, species, and additional information.

**Attributes:**
- `petId: int`
- `name: string`
- `species: string`
- `additionalInfo: string`

**Methods:**
- `__construct(name: string, species: string, additionalInfo: string): void`
- `getPetId(): int`
- `getName(): string`
- `getSpecies(): string`
- `getAdditionalInfo(): string`

