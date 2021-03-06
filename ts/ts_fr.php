<?php
class TS {
	const AppName = "Salsassoc";

	// Global
	const CurrencyText = "%0.2f %s";
	const ShortDateText = "d/m/Y";
	const Yes = "Oui";
	const No = "Non";
	const Unknown = "Inconnu";
	const Currency = "EUR";
	const Date = "Date";

	const DatabaseError = "Erreur de base de donnée : %s => %s : %s";

	// Main
	const Main_Welcome = "Bienvenue dans le gestionnaire ".TS::AppName." !";
	const Main_Menu_Members = "Membres";
	const Main_Menu_People = "Personnes";
	const Main_Menu_Memberships = "Adhésions";
	const Main_Menu_Cotisations = "Cotisations";
	const Main_Menu_FiscalYears = "Années fiscales";
	const Main_Menu_Accounting = "Comptabilité";
	const Main_Menu_Logout = "(Déconnexion)";

	// Fiscal years
	const FiscalYear_FiscalYearCount = "Nombre d'année fiscale : %d";
	const FiscalYear_Label = "Libellé";
	const FiscalYear_YearTitle = "Année #%d";
	const FiscalYear_StartDate = "Date début";
	const FiscalYear_EndDate = "Date de fin";
	const FiscalYear_Members = "Membres";
	const FiscalYear_MembershipAmount = "Montant des adhésions";
	const FiscalYear_View = "Voir";
	const FiscalYear_Form_GlobalInfo = "Informations globales";
	const FiscalYear_Title = "Titre";
	const FiscalYear_IsCurrent = "Année en cours";
	const FiscalYear_EditFiscalYear = "Modification d'une année fiscale";
	const FiscalYear_Members_CotisationsAmount = "Montant cotisations";
	const FiscalYear_Members_CotisationsPaymentMethod = "Mode de paiement";
	const FiscalYears_FiscalYears = "Années fiscales";
    const FiscalYear_OperationsCount = "%d opérations";

	// Cotisation
	const Cotisation_Cotisation = "Cotisation";
	const Cotisation_CotisationTitle = "Cotisation #%d";
	const Cotisation_CotisationAll = "Toutes les cotisations";
	const Cotisation_CotisationMembership = "Adhésions uniquement";
	const Cotisation_CotisationRegister = "Enregistrer une adhésion";
	const Cotisation_NewRegister = "Nouvelle adhésion";
	const Cotisation_Form_GlobalInfo = "Informations globales";
	const Cotisation_CotisationCount = "Nombre de cotisation : %d";
	const Cotisation_Label = "Libellé";
	const Cotisation_Type = "Type";
	const Cotisation_StartDate = "Date début";
	const Cotisation_EndDate = "Date de fin";
	const Cotisation_BasicPrice = "Tarif de base";
	const Cotisation_FiscalYear = "Année";
	const Cotisation_Members = "Membres";
	const Cotisation_AmountCollected = "Montant perçu";
	const Cotisation_Add = "Ajouter";
	const Cotisation_View = "Voir";
	const Cotisation_MembersCount = "%d membres";
	const Cotisation_Type_Membership = "Adhésion";
	const Cotisation_Type_Course = "Cours";
	const Cotisation_Type_Gift = "Don";
	const Cotisation_Type_Credit = "Avoir";
	const Cotisation_CotisationList = "Liste des cotisations";
	const Cotisation_AddNew = "Ajouter une cotisation";

    // Membership
	const Membership_Memberships = "Adhésions";
	const Membership_MembershipAll = "Adhésions";
	const Membership_AddMembership = "Ajouter une adhésion";
	const Membership_MembershipCount = "Nombre d'adhésions : %d";
	const Membership_Date = "Date";
	const Membership_Type = "Type";
	const Membership_View = "Voir";
    const Membership_Num = "Adhésion #%d";
	const Membership_MemberInfos = "Informations du membre";
	const Membership_Membership = "Adhésion";
	const Membership_Comments = "Commentaires";

    // Membership type
	const MembershipType_MembershipStandard = "Standard";
	const MembershipType_MembershipDiscounted = "Avantages jeunes";
	const MembershipType_ExecutiveBoard = "Conseil d'administration";
	const MembershipType_Professor = "Professeur";

	// Person
	const Person_Members = "Membres";
	const Person_MemberNum = "Membre #%d";
	const Person_CurrentMembers = "Membres actuels";
	const Person_AllMembers = "Tous les membres";
	const Person_AddMember = "Ajouter un membre";
	const Person_PersonCount = "Nombre d'adhérents : %d";
	const Person_Add = "Ajouter";
    const Person_MemberId = "Membre #%d";
	const Person_Lastname = "Nom";
	const Person_Firstname = "Prénom";
	const Person_Birthdate = "Date de naissance";
	const Person_Address = "Adresse";
	const Person_Zipcode = "Code postal";
	const Person_City = "Ville";
	const Person_Email = "E-mail";
	const Person_Phonenumber = "Numéro de téléphone";
	const Person_ImageRights = "Droit à l'image";
	const Person_DateCreated = "Date de création";
	const Person_YearCount = "Nombre d'année";
	const Person_View = "Voir";
	const Person_YearCountText = "%d an(s)";
	const Person_OldMember = "Ancien membre";
	const Person_Form_GlobalInfo = "Informations globales";
	const Person_Comments = "Commentaires";
	const Person_Check = "Vérif.";

    // Accounting
    const Accounting_OperationAll = "Toutes les opérations";
    const Accounting_Accounts = "Comptes";
    const Accounting_AccountAdd = "Ajouter un compte";
    const Accounting_OperationCategoryList = "Catégories";
    const Accounting_OperationCategoryAdd = "Ajouter une categorie";
    const Accounting_OperationAdd = "Ajouter une opération";

    // Accounting operation
    const AccountingOperation_OperationCount = "Nombre d'opération : %d";
    const AccountingOperation_Label = "Libellé";
    const AccountingOperation_LabelBank = "Libellé de la banque";
    const AccountingOperation_Number = "Numéro";
    const AccountingOperation_Category = "Catégorie";
    const AccountingOperation_DateValue = "Date";
    const AccountingOperation_DateEffective = "Date effective";
    const AccountingOperation_Type = "Type";
    const AccountingOperation_Amount = "Montant";
    const AccountingOperation_AmountDebit = "Débit";
    const AccountingOperation_AmountCredit = "Crédit";
    const AccountingOperation_FiscalYear = "Année fiscal";
    const AccountingOperation_CalendarYear = "Année civile";
    const AccountingOperation_Account = "Compte";
    const AccountingOperation_View = "Voir";
	const AccountingOperation_Form_GlobalInfo = "Informations globales";
	const AccountingOperation_Form_Transaction = "Transaction";
	const AccountingOperation_Form_Account = "Compte";

    // Accounting operation type
    const AccountingOperationType_Debit = "Débit";
    const AccountingOperationType_Credit = "Crédit";

    // Accountint operation category
    const AccountingOperationCategory_AddCategory = "Ajouter une categorie";
    const AccountingOperationCategory_ViewCategory = "Categorie #%d";
    const AccountingOperationCategory_List = "Liste des categories";
	const AccountingOperationCategory_Form_GlobalInfo = "Informations globales";
    const AccountingOperationCategory_Count = "Nombre de categories: %d";
    const AccountingOperationCategory_Label = "Libellé";
    const AccountingOperationCategory_View = "Voir";

    // Accountint operation method
	const AccountingOperationMethod_Unknown = "Inconnu";
	const AccountingOperationMethod_CheckDeposit = "Remise de chèque(s)";
	const AccountingOperationMethod_CheckPayment = "Paiement par chèque";
	const AccountingOperationMethod_CashDeposit = "Remise d'espèces";
    const AccountingOperationMethod_CashWithdrawal = "Retrait d'espèce";
    const AccountingOperationMethod_BankTransfertReceived = "Virement reçu";
    const AccountingOperationMethod_BankTransfertIssued = "Virement emis";
    const AccountingOperationMethod_BankDirectDebit = "Prélèvement";
    const AccountingOperationMethod_BankInterest = "Intérêts";

    // Accountint account
    const AccountingAccount_List = "Liste des comptes";
	const AccountingAccount_Form_GlobalInfo = "Informations globales";
    const AccountingAccount_AccountCount = "Nombre de compte: %d";
    const AccountingAccount_Label = "Libellé";
    const AccountingAccount_Type = "Type";
    const AccountingAccount_Operations = "Opérations";
    const AccountingAccount_AmountIncomings = "Recettes";
    const AccountingAccount_AmountOutcomings = "Dépenses";
    const AccountingAccount_AmountBalance = "Balance";
    const AccountingAccount_View = "Voir";

	// Payment
	const Payment_Payment = "Paiement";
	const PaymentMethod_None = "Aucun";
	const PaymentMethod_Check = "Chèque";
	const PaymentMethod_Cash = "Espèces";
	const PaymentMethod_CreditCard = "Carte bancaire";

	// Account type
	const AccountType_Other = "Autre";
	const AccountType_CashBox = "Caisse";
	const AccountType_BankAccount = "Compte bancaire";
};
?>
